<?php 
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}


class reserva_List extends WP_List_Table {

    /** Class constructor */
    public function __construct() {

        parent::__construct( [
        'singular' => __( 'reserva', 'sp' ), //singular name of the listed records
        'plural'   => __( 'reservas', 'sp' ), //plural name of the listed records
        'ajax'     => false //should this table support ajax?

        ] );

    }
    public static function get_reservas( $per_page = 15, $page_number = 1 ) {

        global $wpdb;

        $sql = "SELECT * FROM list_reservas";

        if ( ! empty( $_REQUEST['orderby'] ) ) {
            $sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
            $sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
        }

        $sql .= " LIMIT $per_page";

        $sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;


        $result = $wpdb->get_results( $sql, 'ARRAY_A' );

        return $result;
    }


    public static function delete_reserva( $id ) {
        global $wpdb;

        $wpdb->delete(
            "list_reservas",
            [ 'id' => $id ],
            [ '%d' ]
            );
    }

    public static function record_count() {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM list_reservas";

        return $wpdb->get_var( $sql );
    }

    public function no_items() {
        _e( 'Nenhuma mensagem de reserva no momento.', 'sp' );
    }

    function column_name( $item ) {

        $delete_nonce = wp_create_nonce( 'sp_delete_reserva' );

        $title = '<strong>' . $item['nome'] . '</strong>';

        $actions = [
        'delete' => sprintf( '<a href="?page=%s&action=%s&reserva=%s&_wpnonce=%s">Excluir</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['id'] ), $delete_nonce )
        ];

        return $title . $this->row_actions( $actions );
    }
    public function column_default( $item, $column_name ) {
        return $item[ $column_name ];
    }
    function column_cb( $item ) {
        return sprintf(
            '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['ID']
            );
    }
    function get_columns() {
        $columns = [
        'cb'      => '<input type="checkbox" />',
        'nome'    => __( 'Nome', 'sp' ),
        'email' => __( 'Email', 'sp' ),
        'telefone'    => __( 'Telefone', 'sp' ),
        'mensagem' => __( 'Mensagem', 'sp' ),
        ];

        return $columns;
    }

    public function get_sortable_columns() {
        $sortable_columns = array(
            'nome' => array( 'nome', true ),
            'email' => array( 'email', false ),
            'telefone' => array( 'telefone', false ),
            'mensagem' => array( 'mensagem', false ),
            );

        return $sortable_columns;
    }

    public function get_bulk_actions() {
        $actions = [
        'bulk-delete' => 'Excluir'
        ];

        return $actions;
    }

    public function prepare_items() {

        $this->_column_headers = array($this->get_columns(), array(), $this->get_sortable_columns, 'nome');

        /** Process bulk action */
        $this->process_bulk_action();

        $per_page     = $this->get_items_per_page( 'reservas_per_page', 15 );
        $current_page = $this->get_pagenum();
        $total_items  = self::record_count();

        $this->set_pagination_args( [
        'total_items' => $total_items, //WE have to calculate the total number of items
        'per_page'    => $per_page //WE have to determine how many items to show on a page
        ] ); 


        $this->items = self::get_reservas( $per_page, $current_page );
    }
    public function process_bulk_action() {

        if ( 'delete' === $this->current_action() ) {

            $nonce = esc_attr( $_REQUEST['_wpnonce'] );

            if ( ! wp_verify_nonce( $nonce, 'sp_delete_reserva' ) ) {
                die( 'Go get a life script kiddies' );
            }
            else {
                self::delete_reserva( absint( $_GET['reserva'] ) );

                wp_redirect( esc_url( add_query_arg() ) );
                exit;
            }

        }

        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
            || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
            ) {

            $delete_ids = esc_sql( $_POST['bulk-delete'] );

            if ($delete_ids > 0) {
                foreach ( $delete_ids as $id ) {
                    self::delete_reserva( $id );

                }
            }

            wp_redirect( esc_url( add_query_arg() ) );
            exit;
        }
    }
}