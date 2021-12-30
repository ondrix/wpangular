<?php
function pt_create_table_persons()
{
  if (!class_exists("MB_Custom_Table_API")) {
    return;
  }
  MB_Custom_Table_API::create("pt_persons", [
    "name" => "TEXT NOT NULL",
  ]);
}

add_action("init", "pt_create_table_persons");
