<li class="search-result">
  <h2 class="title"><a href="<?php print $url; ?>"><?php print $title; ?></a></h2>
  <?php if ($snippet or $info_split): ?>
    <div class="search-snippet-info">
      <?php if ($snippet) : ?>
        <p class="search-snippet"><?php print $snippet; ?></p>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</li>
