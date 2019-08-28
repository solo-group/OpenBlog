<?php header('Content-type: text/xml'); ?>
<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url();?></loc> 
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= base_url('About');?></loc>
        <priority>0.80</priority>
    </url>
    <url>
        <loc><?= base_url('login');?></loc>
        <priority>0.80</priority>
    </url>
    <url>
        <loc><?= base_url('register');?></loc>
        <priority>0.80</priority>
    </url>
    <url>
        <loc><?= base_url('posts');?></loc>
        <priority>0.80</priority>
    </url>

    <?php foreach ($categories as $category): ?>
    <url>
        <loc><?= base_url('category/').$category['cat_name'] ?></loc>
        <priority>0.80</priority>
    </url>
    <?php endforeach ?>

    <?php foreach ($posts as $post): ?>
    <url>
        <loc><?= base_url('post/').$post['post_slug'] ?></loc>
        <priority>0.65</priority>
    </url>
    <?php endforeach ?>
</urlset>