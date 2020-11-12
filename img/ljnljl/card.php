<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Database/db_sett.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/functions/functions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>
<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">1/month</h4>
      </div>
      <div class="card-body">
       <img src="/img/version3.png "style="width:200px; height:200px;" alt="">
        <ul class="list-unstyled mt-3 mb-4">
          <li>действует 1 месяц</li>
          
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary"href="/singup.php">перейти</button>      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">6/month</h4>
      </div>
      <div class="card-body">
      <img src="/img/version2.png "style="width:200px; height:200px;" alt="">        <ul class="list-unstyled mt-3 mb-4">
          <li>действует 6 месяцев</li>
          
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary"href="/singup.php">перейти</button>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">12/month</h4>
      </div>
      <div class="card-body">
      <img src="/img/version1.png "style="width:200px; height:200px;" alt="">        <ul class="list-unstyled mt-3 mb-4">
          <li>действует 12 меяцев</li>
          
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary"href="/singup.php">перейти</button>
      </div>
    </div>
  </div>

  