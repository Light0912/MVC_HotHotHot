<?php

use Model\Documentation;
use vendor\System\Request;
use vendor\System\System;

class DocumentationController extends System
{
    public function home(Request $request)
    {
        $documentation = new Documentation();

        $data = $documentation->getAllData("docs");
        $this->render('documentation/home', ['docs' => $data]);
    }

    public function create(Request $request)
    {
        $documentation = new Documentation();
        if ($request->isPOST()) {
            $documentation->setTitle($request->get("title"));
            $documentation->setContent($request->get("content"));
            $query = self::getDatabase()->prepare('INSERT INTO docs SET title = ?, content = ?');
            $query->execute([$documentation->getTitle(), $documentation->getContent()]);
            $this->redirect("/docs");
        }
        $this->render("documentation/create");
    }

    public function doc(Request $request)
    {
        $id = $request->getUrlParams()['id'];
        $documentation = Documentation::get("id = " . $id);

        $this->render("documentation/doc", ["doc" => $documentation[0]]);

    }

    public function delete(Request $request)
    {
        $id = $request->getUrlParams()['id'];
        $documentation = Documentation::get("id = " . $id);
        $query = self::getDatabase()->prepare("DELETE FROM `docs` WHERE id = '$id'");
        $query->execute();
        $this->redirect("/docs");

    }
    public function update(Request $request)
    {
        $id = $request->getUrlParams()['id'];
        $documentation = Documentation::get("id = " . $id);
        if ($request->isPOST()) {
            $query = self::getDatabase()->prepare("UPDATE `docs` SET title = ?, content = ?");
            $query->execute([$request->get("title"), $request->get("content")]);
            $this->redirect("/docs/update/$id");
        }
        $this->render("documentation/update", ["doc" => $documentation[0]]);
    }
}