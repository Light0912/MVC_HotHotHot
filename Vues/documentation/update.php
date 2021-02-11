<form action="" method="post">
    <label>
        <input type="text" name="title" value="<?=$doc->getTitle()?>">
    </label>
    <label>
        <textarea name="content" id="content"><?=$doc->getTitle()?></textarea>
    </label>
    <button type="submit" name="new_doc">update</button>
</form>

