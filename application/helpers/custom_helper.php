<?php
function assets($file = '')
{
  return base_url('assets/' . $file);
}

// Helper untuk memanggil assets
function templates($a = '')
{
  return base_url('assets/templates/sb-admin/' . $a);
}

// Helper untuk memanggil leaflet
function leaflet($b = '')
{
  return base_url('assets/leaflet/' . $b);
}

// Helper untuk plugin datatable tambahan
function datatable($c = '')
{
  return base_url('assets/DataTables/' . $c);
}

// Helper untuk foto profile
function img($d = '')
{
  return base_url('assets/img/' . $d);
}

// Helper untuk foto profile
function select($e = '')
{
  return base_url('assets/bootstrap-select/dist/' . $e);
}
