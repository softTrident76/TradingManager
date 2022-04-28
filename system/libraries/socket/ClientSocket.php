<?php

class ClientSocket {

    public static $csocket = null;
    private static $host;
    private static $port;

    public function __construct()
    {
    }

    public static function initSocket($_host = "192.168.8.109", $_port = "25003") {
        echo "init"."<br/>";
        self::$host = $_host;
        self::$port = $_port;
        if( self::$csocket == null || get_resource_type(self::$csocket) != "Socket" ) {
            self::$csocket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            $result = socket_connect(self::$csocket, self::$host, self::$port) or die("Could not connect to server\n");
        }
    }

    public static function sendMessage($message) {
        $bytes = socket_write(self::$csocket, $message, strlen($message));
        if( !$bytes )
            return false;
        return $bytes;
    }

    public static function readMessage() {
//        socket_set_option(self::$csocket, SOL_SOCKET, SO_RCVTIMEO, array('sec'=> 10, 'usec'=> 0));
        return socket_read(self::$csocket, 1024);
    }

    public static function destroy() {
        socket_close(self::$csocket);
    }
}