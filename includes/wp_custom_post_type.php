<?php

function evtvmarket_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Clientes', 'Post Type General Name', 'evtvmarket' ),
		'singular_name'         => _x( 'Cliente', 'Post Type Singular Name', 'evtvmarket' ),
		'menu_name'             => __( 'Clientes', 'evtvmarket' ),
		'name_admin_bar'        => __( 'Clientes', 'evtvmarket' ),
		'archives'              => __( 'Archivo de Clientes', 'evtvmarket' ),
		'attributes'            => __( 'Atributos de Cliente', 'evtvmarket' ),
		'parent_item_colon'     => __( 'Cliente Padre:', 'evtvmarket' ),
		'all_items'             => __( 'Todos los Clientes', 'evtvmarket' ),
		'add_new_item'          => __( 'Agregar Nuevo Cliente', 'evtvmarket' ),
		'add_new'               => __( 'Agregar Nuevo', 'evtvmarket' ),
		'new_item'              => __( 'Nuevo Cliente', 'evtvmarket' ),
		'edit_item'             => __( 'Editar Cliente', 'evtvmarket' ),
		'update_item'           => __( 'Actualizar Cliente', 'evtvmarket' ),
		'view_item'             => __( 'Ver Cliente', 'evtvmarket' ),
		'view_items'            => __( 'Ver Clientes', 'evtvmarket' ),
		'search_items'          => __( 'Buscar Cliente', 'evtvmarket' ),
		'not_found'             => __( 'No hay resultados', 'evtvmarket' ),
		'not_found_in_trash'    => __( 'No hay resultados en Papelera', 'evtvmarket' ),
		'featured_image'        => __( 'Imagen del Cliente', 'evtvmarket' ),
		'set_featured_image'    => __( 'Colocar Imagen del Cliente', 'evtvmarket' ),
		'remove_featured_image' => __( 'Remover Imagen del Cliente', 'evtvmarket' ),
		'use_featured_image'    => __( 'Usar como Imagen del Cliente', 'evtvmarket' ),
		'insert_into_item'      => __( 'Insertar en Cliente', 'evtvmarket' ),
		'uploaded_to_this_item' => __( 'Cargado a este Cliente', 'evtvmarket' ),
		'items_list'            => __( 'Listado de Clientes', 'evtvmarket' ),
		'items_list_navigation' => __( 'Navegación del Listado de Cliente', 'evtvmarket' ),
		'filter_items_list'     => __( 'Filtro del Listado de Clientes', 'evtvmarket' ),
	);
	$args = array(
		'label'                 => __( 'Cliente', 'evtvmarket' ),
		'description'           => __( 'Portafolio de Clientes', 'evtvmarket' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'tipos-de-clientes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 15,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'clientes', $args );

}

add_action( 'init', 'evtvmarket_custom_post_type', 0 );