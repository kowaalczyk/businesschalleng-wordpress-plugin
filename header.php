<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> and opens the body tag.
 *
 * @link http://linkedin.com/in/kowaalczyk
 *
 * @package HSBC_Theme
 * @subpackage Main_Theme
 * @since 0.1
 * @version 0.1
 */

?><!DOCTYPE html>

<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>High School Business Challenge Dev Theme</title>

    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>