<?php

$data1 = [array("nama_bidang"=>"Bidang 1",
                "data_sub"=>[array("id_sub"=>"1","nama_sub"=>"Sub 1"),
                             array("id_sub"=>"2","nama_sub"=>"Sub 2")
                            ]
            ),
         array("nama_bidang"=>"Bidang2",
                "data_sub"=>[array("id_sub"=>"3","nama_sub"=>"Sub 3"),
                             array("id_sub"=>"4","nama_sub"=>"Sub 4")
                            ]
            )
      ];


$data2 = array("nama_sub"=>"Sub 1", 
            "data_keg"=>[array("nama_keg"=>"","tanggal"=>"","jumlah"=>""),
                         array("nama_keg"=>"","tanggal"=>"","jumlah"=>""),
                         array("nama_keg"=>"","tanggal"=>"","jumlah"=>"")
                        ]
            );

$data3 = array("nama_bidang"=>"Bidang 1",
            "nama_sub"=>"Sub-bidang 1",
            "nama_keg"=>"Kegiatan 1",
            "tanggal"=>"Tanggal 1",
            "data_uraian"=>[array("nama_uraian"=>"Uraian 1",
                                  "total"=>" Total 1",
                                  "data_rincian"=>[array("nama_rincian"=>"rincian 1","dana_rincian"=>"dana 1"),
                                                   array("nama_rincian"=>"rincian 2","dana_rincian"=>"dana 2")
                                                   ]
                                  ),
                            array("nama_uraian"=>"Uraian 2",
                                  "total"=>" Total 2",
                                  "data_rincian"=>[array("nama_rincian"=>"rincian 1","dana_rincian"=>"dana 1"),
                                                   array("nama_rincian"=>"rincian 2","dana_rincian"=>"dana 2")
                                                   ]
                                 )
                            ]
            );
?>