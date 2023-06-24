<?php

function security($text)
{
  $text = trim($_POST[$text]);
  $text = stripslashes($text);
  $text = htmlspecialchars($text);
  return $text;
}
function sayac()
{
  for ($i = 20; $i <= 100; $i++) {
    echo "<option  value='$i'>$i</option>";
  }
}

function sayac2()
{
  for ($i = 1; $i <= 5; $i++) {
    echo "<option  value='$i'>$i</option>";
  }
}



function toastSuccess($par)
{
  return "<div class='toast myToast toastsuccess border-0' role='alert' data-bs-delay='10000' aria-live='assertive' aria-atomic='true'>
     <div class='toast-header border-0'>
        <strong class='me-auto'>İşlem</strong>
        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
     </div>
     <div class='toast-body py-4 border-0 text-white'>
        $par
     </div>
   </div>";
}

function toastWarning($par)
{
  return "<div class='toast myToast toastWarning border-0' role='alert' data-bs-delay='10000' aria-live='assertive' aria-atomic='true'>
     <div class='toast-header border-0'>
        <strong class='me-auto'>İşlem</strong>
        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
     </div>
     <div class='toast-body py-4 border-0 text-white'>
        $par
     </div>
   </div>";
}

function toastError($par)
{
  return "<div class='toast myToast toastError border-0' role='alert' data-bs-delay='10000' aria-live='assertive' aria-atomic='true'>
     <div class='toast-header border-0'>
        <strong class='me-auto'>İşlem</strong>
        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
     </div>
     <div class='toast-body py-4 border-0 text-white'>
        $par
     </div>
   </div>";
}
