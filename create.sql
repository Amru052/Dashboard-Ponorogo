CREATE TABLE `bidang` (
  `id_bidang` varchar(255) PRIMARY KEY,
  `nama_bidang` varchar(255)
);

CREATE TABLE `subbidang` (
  `id_sub` varchar(255) PRIMARY KEY,
  `nama_sub` varchar(255),
  `id_bidang` varchar(255)
);

CREATE TABLE `kegiatan` (
  `id_kegiatan` varchar(255) PRIMARY KEY,
  `nama_kegiatan` varchar(255),
  `tanggal` date,
  `id_sub` varchar(255)
);

CREATE TABLE `uraian` (
  `id_uraian` varchar(255) PRIMARY KEY,
  `nama_uraian` varchar(255),
  `id_kegiatan` varchar(255)
);

CREATE TABLE `rincian` (
  `id_rincian` varchar(255) PRIMARY KEY,
  `nama_rincian` varchar(255),
  `volume` integer,
  `harga` bigint,
  `satuan` varchar(255),
  `id_uraian` varchar(255)
);

ALTER TABLE `subbidang` ADD FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`);

ALTER TABLE `kegiatan` ADD FOREIGN KEY (`id_sub`) REFERENCES `subbidang` (`id_sub`);

ALTER TABLE `uraian` ADD FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`);

ALTER TABLE `rincian` ADD FOREIGN KEY (`id_uraian`) REFERENCES `uraian` (`id_uraian`);

INSERT INTO `bidang` VALUES ('1','Pemerintahan'),
                            ('2','Pembangunan'),
                            ('3','Pembinaan'),
                            ('4','Perberdayaan');
INSERT INTO `subbidang` VALUES ('11','Belanja Desa','1'),
                                ('12','Perencanaan', '1'),
                                ('13','Pelaporan','2'),
                                ('14','Tata Praja Pemerintahan','2');
INSERT INTO `kegiatan` VALUES ('111','Penataan Desa','12a','11'),
                                ('112','Operasional Desa','13a','11'),
                                ('113','Tunjangan','15a','12'),
                                ('114','Penyediaan Intensif','123a','12');
INSERT INTO `uraian` VALUES ('1111','Alat Tulis Kantor','111'),
                                ('1112','Tambahan Tunjangan', '111'),
                                ('1113','Makanan dan minuman','112'),
                                ('1114','Material Lainnya','112');
INSERT INTO `rincian` VALUES ('11111','Amplop',1,15000,'lembar','1111'),
                                ('11112','Kertas HVS',2,500000,'rim', '1111'),
                                ('11113','Makan dan minum rapat',3,1000000,'box','1112'),
                                ('11114','Belanja Snack',5,1500000,'kg','1112');


$data2 = [array("id _bidang"=>"1",
                "nama_bidang"=>"Pemerintahan",
                "data_sub"=>[array("id_sub"=>"11","nama_sub"=>"Belanja Desa","dana"=>1*15000+2*500000),
                             array("id_sub"=>"12","nama_sub"=>"Perencanaan")
                            ]
            ),
         array("id _bidang"=>"2",
                "nama_bidang"=>"Pembangunan",
                "data_sub"=>[array("id_sub"=>"13","nama_sub"=>"Pelaporan"),
                             array("id_sub"=>"14","nama_sub"=>"Tata Praja Pemerintahan")
                            ]
            )
      ];
                           
SELECT b.id_bidang,b.nama_bidang, s.id_sub, s.nama_sub,sum(r.volume*r.harga) as total FROM bidang as b join subbidang as s ON b.id_bidang = s.id_bidang join kegiatan as k on s.id_sub = k.id_sub join uraian as u on k.id_kegiatan = u.id_kegiatan join rincian as r on u.id_uraian = r.id_uraian;