<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Entity;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //********PARTICULARES********PARTICULARES********PARTICULARES*********** */
        // Solicitante #1.
        $applicant = new User();
        $applicant->identification_card = "183570235";
        $applicant->names = "Casa";
        $applicant->surnames = "cultura";
        $applicant->email = "applicant@mail.com";        
        $applicant->cellphone = "3217816922";
        $applicant->assignRole(['applicant', 'particular_person']);
        $applicant->save();

        // Solicitante #2.
        $applicant2 = new User();
        $applicant2->identification_card = "183570230";
        $applicant2->names = "Casitaa";
        $applicant2->surnames = "curall";
        $applicant2->email = "applicant2@mail.com";
        $applicant2->cellphone = "3114707230";
        $applicant2->assignRole(['applicant', 'particular_person']);
        $applicant2->save();

        //*********PÚBLICOS*********PÚBLICOS*********PÚBLICOS*********PÚBLICOS********** */
        // Solicitante Público #1.
        $entity = new Entity();
        $entity->name = "Alcaldia ejemplo";
        $entity->nit = "12356789";
        $entity->cellphone = "146982357";
        $entity->type = "public";
        // $entity->assignRole(['applicant', 'public_entity']);
        $entity->save();

        // Solicitante Público #2.
        $entity2 = new Entity();
        $entity2->name = "Alcaldia2 ejemplo";
        $entity2->nit = "123567839";
        $entity2->cellphone = "1426982357";
        $entity2->type = "public";
        // $entity2->assignRole(['applicant', 'public_entity']);
        $entity2->save();

        //**********PRIVADOS**********PRIVADOS**********PRIVADOS**********PRIVADOS********* */
        // Solicitante Privado #1.
        $entity3 = new Entity();
        $entity3->name = "Iglesia ejemplo";
        $entity3->nit = "123d7839";
        $entity3->cellphone = "142982357";
        $entity3->type = "private";
        // $entity3->assignRole(['applicant', 'private_entity']);
        $entity3->save();

        // Solicitante Privado #2.
        $entity4 = new Entity();
        $entity4->name = "Iglesia2 ejemplo";
        $entity4->nit = "123d78339";
        $entity4->cellphone = "1429282357";
        $entity4->type = "private";
        // $entity4->assignRole(['applicant', 'private_entity']);
        $entity4->save();
    }
}
