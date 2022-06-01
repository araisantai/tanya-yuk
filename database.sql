-- database : tanya_jawab
-- tabel:
-- 	Pengguna:
-- 		varchar username (PK)
-- 		varchar pass
-- 		varchar nama_asli	
-- 		## Opsional
-- 		BLOB foto 
-- 		varchar deskripsi_akun
-- 	Pertanyaan:
-- 		varchar pertanyaan (PK)
-- 		varchar username (FK)
-- 		BLOB image ## opsional
-- 	Jawaban / Komentar:
-- 		varchar komentar
-- 		varchar pertanyaan (FK)
-- 		BLOB image ## opsional

DROP DATABASE IF EXISTS tanya_jawab;
CREATE DATABASE tanya_jawab;


-- DROP TABLE
DROP TABLE IF EXISTS J_K;
DROP TABLE IF EXISTS Pertanyaan;
DROP TABLE IF EXISTS Pengguna;


CREATE TABLE Pengguna(
username VARCHAR(50),
password VARCHAR(20),
nama_akun VARCHAR(50),
-- #foto_akun BLOB,
-- #deskripsi_akun VARCHAR (300),
CONSTRAINT uname_PK PRIMARY KEY(username));

CREATE TABLE Pertanyaan(
id_pertanyaan serial,
pertanyaan VARCHAR(300),
username VARCHAR (50),
foto_pertanyaan VARCHAR (50),
CONSTRAINT pertanyaan_PK PRIMARY KEY(id_pertanyaan),
CONSTRAINT uname_FK FOREIGN KEY(username) references Pengguna(username) ON DELETE CASCADE ON UPDATE CASCADE);

CREATE TABLE J_K(
komentar VARCHAR (300),
id_pertanyaan serial,
foto_komentar VARCHAR (50),
CONSTRAINT uname_FK FOREIGN KEY(id_pertanyaan) references Pertanyaan(id_pertanyaan) ON DELETE CASCADE ON UPDATE CASCADE);
