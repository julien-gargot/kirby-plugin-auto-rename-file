<?php

kirby()->hook('panel.file.upload', function($file) {
  // $panel    = $this->panel();
  // $kirby    = $this->kirby();
  // $site     = $this->site();
  // $user     = $this->user();
  // $username = $this->username();
  // $role     = $this->role();

  $site = $this->site();
  $page = $file->page();
  $title = $page->title();
  $old_name = $file->name();
  $extension = $file->extension();

  try {
      $name = $old_name . "-" . $page->title() . "-" . $site->title();
      if($count = $page->files()->filterBy('filename', '*=', $name)->count() ) {
        $name = $name . "(". $count+1 .")";
      }
      $file->rename($name);
      echo 'The file has been renamed';
  } catch(Exception $e) {
      echo 'The file has been renamed';
      echo $e->getMessage();
  }

});
