<?php

use Illuminate\Database\Seeder;
use App\Area;
class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area_21= new Area();
        $area_21->name='21';
        $area_21->save();

        $area_alidem= new Area();
        $area_alidem->name='Ali Demi';
        $area_alidem->save();

        $area_laprake= new Area();
        $area_laprake->name='Laprake';
        $area_laprake->save();

        $area_fresk= new Area();
        $area_fresk->name='Fresk';
        $area_fresk->save();

        $area_komuna= new Area();
        $area_komuna->name='Komuna e Parisit';
        $area_komuna->save();

        $area_msh= new Area();
        $area_msh->name='Myslym Shyri';
        $area_msh->save();

        $area_z1= new Area();
        $area_z1->name='Zogu I';
        $area_z1->save();

        $area_zz= new Area();
        $area_zz->name='Zogu i Zi';
        $area_zz->save();

        $area_ure= new Area();
        $area_ure->name='Unaza e Re';
        $area_ure->save();

        $area_bllok= new Area();
        $area_bllok->name='ish Blloku';
        $area_bllok->save();

        $area_selite= new Area();
        $area_selite->name='Selite';
        $area_selite->save();

        $area_elb= new Area();
        $area_elb->name='rruga e Elbasanit';
        $area_elb->save();

        $area_kavaje= new Area();
        $area_kavaje->name='rruga e Kavajes';
        $area_kavaje->save();

        $area_other= new Area();
        $area_other->name='Other';
        $area_other->save();
    }
}
