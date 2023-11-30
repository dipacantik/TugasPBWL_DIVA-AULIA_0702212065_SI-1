CREATE TABLE tb_pelanggan (
	pel_id INT(11) NOT NULL AUTO_INCREMENT,
	pel_id_gol TINYINT(3) NOT NULL,
	pel_no VARCHAR (20) NOT NULL,
	pel_nama VARCHAR (50) NOT NULL,
	pel_alamat TEXT,
	pel_hp VARCHAR (20) NOT NULL,
	pel_ktp VARCHAR (50) NOT NULL,
	pel_seri INT (11) NOT NULL,
	pel_meteran VARCHAR (20) NOT NULL,
	pel_aktif ENUM("Y","N") NOT NULL,
	pel_id_user int (11) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT NULL,
	PRIMARY KEY(pel_id)
);

CREATE TABLE tb_golongan (
	gol_id TINYINT NOT NULL AUTO_INCREMENT,
	gol_kode VARCHAR(10) NOT NULL,
	gol_nama VARCHAR(50) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT NULL,
	PRIMARY KEY(gol_id)
);

CREATE TABLE tb_users (
	user_id INT(11) NOT NULL AUTO_INCREMENT,
	user_email VARCHAR(50) NOT NULL,
	user_password VARCHAR(100) NOT NULL,
	user_nama VARCHAR(100) DEFAULT NULL,
	user_alamat TEXT DEFAULT NULL,
	user_hp VARCHAR(25) DEFAULT NULL,
	user_pos VARCHAR(5) DEFAULT NULL,
	user_role TINYINT(2) DEFAULT NULL,
	user_aktif TINYINT(2) DEFAULT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT NULL,
	PRIMARY KEY(user_id),
	UNIQUE KEY(user_email)
);

INSERT INTO
	tb_users
VALUES
	(
		1,
		'admin@gmail.com',
		'*4ACFE3202A5FF5CF467898FC58AAB1D615029441',
		'Administrator',
    'Medan',
    '081234567890',
    '20111',
    1,
     1,
		'2023-11-03 03:40:43',
		NULL
	);