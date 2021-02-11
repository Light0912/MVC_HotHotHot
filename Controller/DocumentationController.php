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
        $documentation = Documentation::get("id = {$id}");
        $file = $documentation->getCacheUrl();
        if ($this->isCache($file)) {
            $this->readCache($file);
            exit();
        } else {
            $this->onCache(
                $this->render(
                    "documentation/doc", ["doc" => $documentation]
                ),
                $documentation->getId()
            );
        }
    }

    public function delete(Request $request)
    {
        $id = (int) $request->getUrlParams()['id'];
        $documentation = Documentation::get("id = {$id}");
        $documentation->delete();
        unlink($documentation->getCacheUrl());

        $this->redirect("/docs");
    }

    public function update(Request $request): bool|string
    {
        $id = $request->getUrlParams()['id'];
        $documentation = Documentation::get("id = {$id}");
        if ($request->isPOST()) {
            $documentation->setTitle($request->get("title"));
            $documentation->setContent($request->get("content"));
            $documentation->update();
            if ($documentation->getCacheUrl() !== "") {
                unlink($documentation->getCacheUrl());
            }
            $this->redirect("/doc/{$id}");
        }
        return $this->render("documentation/update", ["doc" => $documentation]);
    }
}