<?php

function Rp($value) {
  $format = "Rp " . number_format((float)$value,0,',','.');
  return $format;
}