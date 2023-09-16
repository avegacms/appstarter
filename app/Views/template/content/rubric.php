<?php

use CodeIgniter\Pager\Pager;

/**
 * @var $content
 * @var $posts
 * @var Pager $pager
 */
d($posts, $content);

?>

<?php echo $pager->links(template: 'full') ?>