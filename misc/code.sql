CREATE DATABASE db_novee;

CREATE TABLE admin (
  id_admin int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nama_admin varchar(150) NOT NULL,
  no_telp int(11) NOT NULL,
  alamat varchar(150) NOT NULL,
  username varchar(150) NOT NULL,
  password varchar(150) NOT NULL
)

CREATE TABLE pelanggan (
  id_pelanggan int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nama_pelanggan varchar(150) NOT NULL,
  no_telp int(11) NOT NULL,
  alamat varchar(150) NOT NULL,
  username varchar(150) NOT NULL,
  password varchar(150) NOT NULL
)

CREATE TABLE menu (
    id_menu int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nama_manu varchar(150) NOT NULL,
    harga_menu int(11) NOT NULL
)

CREATE TABLE orders (
    id_orders int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_pelanggan int(11),
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan),
    id_menu int(11),
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu),
    total_harga int(11) 
)