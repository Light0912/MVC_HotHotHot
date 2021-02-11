<?php

use Model\Documentation;
use vendor\System\Request;
use vendor\System\System;

class DocumentationController extends System
{
    public function home(): bool|string
    {
        $documentation = new Documentation();
        $parents = $documentation->getAllData("docs", "parent_id = 0");
        $tree = [];

        foreach ($parents as $parent) {
            $id = (int)$parent['id'];
            $childrens = $documentation->getAllData(
                "docs", "parent_id = {$id}"
            );
            if ($childrens) {
                foreach ($childrens as $children) {
                    $id = (int)$children['id'];
                    $sub_childrens = $documentation->getAllData(
                        "docs", "parent_id = {$id}"
                    );
                    if ($sub_childrens) {
                        foreach ($sub_childrens as $sub_children){
                            $children[] = $sub_children;
                        }
                    }
                $parent[] = $children;
                }
            }
            $tree[] = $parent;
        }

        return $this->render('documentation/home', [
            "tree" => $this->renderTree($tree, 'title', 'id'),
        ]);
    }

    public function create(Request $request): bool|string
    {
        $documentation = new Documentation();
        $data = $documentation->getAllData("docs");

        if ($request->isPOST()) {
            $documentation->setTitle($request->get("title"));
            $documentation->setContent($request->get("content"));
            $documentation->setParentId($request->get("parent_id"));
            $query = self::getDatabase()->prepare(
                'INSERT INTO docs SET title = ?, content = ?, parent_id = ?'
            );
            var_dump($documentation->getParentId());
            $query->execute([
                $documentation->getTitle(),
                $documentation->getContent(),
                (int)$documentation->getParentId()
            ]);
            $this->redirect("/docs");
        }

        return $this->render("documentation/create", [
            "docs" => $data
        ]);
    }

    public function doc(Request $request)
    {
        $id = $request->getUrlParams()['id'];
        $documentation = Documentation::get("id = " . $id);
        $file = $documentation['cache_url'];
        if ($this->isCache($file)) {
            $this->readCache($file);
            exit();
        } else {
            $this->onCache(
                $this->render(
                    "documentation/doc", ["doc" => $documentation]
                ),
                $documentation['id']
            );
        }
    }

    public function delete(Request $request)
    {
        $id = $request->getUrlParams()['id'];
        $documentation = Documentation::get("id = " . $id)[0];
        $query = self::getDatabase()->prepare(
            "DELETE FROM `docs` WHERE id = '$id'"
        );

        $query->execute();
        unlink($documentation['cache_url']);
        $this->redirect("/docs");
    }

    public function update(Request $request)
    {
        $id = $request->getUrlParams()['id'];
        $documentation = Documentation::get("id = " . $id)[0];
        var_dump($documentation['cache_url']);
        if ($request->isPOST()) {
            $query = self::getDatabase()->prepare(
                "UPDATE `docs` SET title = ?, content = ?"
            );
            $query->execute([$request->get("title"), $request->get("content")]);
            if ($documentation['cache_url'] !== "") {
                unlink($documentation['cache_url']);
            }
            $this->redirect("/doc/$id");
        }
        return $this->render("documentation/update", ["doc" => $documentation]);
    }
}