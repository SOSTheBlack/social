<?php

namespace Database\Seeders;

use App\Repositories\Contracts\SocialMediaRepository;
use App\SocialMedias\Instagram\Instagram;
use Illuminate\Database\Seeder;

/**
 * Class CreateSocialMediaTableSeeder
 *
 * @package Database\Seeders
 */
class CreateSocialMediaTableSeeder extends Seeder
{
    /**
     * @var SocialMediaRepository
     */
    private SocialMediaRepository $socialMediaRepository;

    /**
     * CreateSocialMediaTableSeeder constructor.
     *
     * @param  SocialMediaRepository  $socialMediaRepository  '
     */
    public function __construct(SocialMediaRepository $socialMediaRepository)
    {
        $this->socialMediaRepository = $socialMediaRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->socialMediaRepository->firstOrCreate(
            [
                'id' => 1,
                'name' => Instagram::NAME,
                'slug' => Instagram::SLUG,
                'description' => 'Instagram é uma rede social online de compartilhamento de fotos e vídeos entre seus usuários, que permite aplicar filtros digitais e compartilhá-los em uma variedade de serviços de redes sociais, como Facebook, Twitter, Tumblr e Flickr.'
            ]
        );
        $this->socialMediaRepository->firstOrCreate(
            [
                'id' => 2,
                'name' => 'Facebook',
                'slug' => 'facebook',
                'description' => 'O Facebook é um utilitário social que conecta você com as pessoas ao seu redor. No Facebook você pode se conectar e compartilhar o que quiser com quem é importante em sua vida.'
            ]
        );
        $this->socialMediaRepository->firstOrCreate(
            [
                'id' => 3,
                'name' => 'Twitter',
                'slug' => 'twitter',
                'description' => 'Twitter é uma rede social e um servidor para microblogging, que permite aos usuários enviar e receber atualizações pessoais de outros contatos, por meio do website do serviço, por SMS e por softwares específicos de gerenciamento.'
            ]
        );
    }
}
