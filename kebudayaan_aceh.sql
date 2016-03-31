/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Mar 29, 2016
 * @Time 10:31:11 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/SQLTemplate.sql.
 * 
 */

CREATE DATABASE kebudayaan_aceh;

USE
  kebudayaan_aceh;

CREATE TABLE tb_kuliner_aceh(
  id_kuliner_aceh VARCHAR(150) NOT NULL PRIMARY KEY,
  judul_kuliner VARCHAR(50) NOT NULL,
  gambar_kuliner VARCHAR(150) NOT NULL,
  deskripsi_kuliner TEXT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE tb_musik_aceh(
  id_musik_aceh VARCHAR(150) NOT NULL PRIMARY KEY,
  judul_musik VARCHAR(50) NOT NULL,
  musik_aceh VARCHAR(150) NOT NULL,
  deskripsi_musik TEXT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE tb_tarian_aceh(
  id_tarian_aceh VARCHAR(150) NOT NULL PRIMARY KEY,
  judul_tarian VARCHAR(50) NOT NULL,
  video_tarian VARCHAR(150) NOT NULL,
  deskripsi_tarian TEXT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE tb_wisata_aceh(
  id_wisata_aceh VARCHAR(150) NOT NULL PRIMARY KEY,
  judul_wisata VARCHAR(50) NOT NULL,
  gambar_wisata VARCHAR(150) NOT NULL,
  deskripsi_wisata TEXT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE tb_user(
  email VARCHAR(50) NOT NULL PRIMARY KEY,
  password VARCHAR(150) NOT NULL
) ENGINE = InnoDB;