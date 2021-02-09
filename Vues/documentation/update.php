<form action="" method="post">
    <label>
        <input type="text" name="title" value="<?=$doc['title']?>">
    </label>
    <label>
        <textarea name="content" id="content"><?=$doc['content']?></textarea>
    </label>
    <button type="submit" name="new_doc">update</button>
</form>