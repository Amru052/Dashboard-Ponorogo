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

$data3 = array("nama_bidang"=>"",
            "nama_sub"=>"",
            "nama_keg"=>"",
            "tanggal"=>"",
            "data_uraian"=>[array("nama_uraian"=>"",
                                  "total"=>"",
                                  "data_rincian"=>[array("nama_rincian"=>"","dana_rincian"=>""),
                                                   array("nama_rincian"=>"","dana_rincian"=>"")
                                                   ]
                                 )
                            ]
            );
?>