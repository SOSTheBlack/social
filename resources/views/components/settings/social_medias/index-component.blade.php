<?php

/** @var App\Entities\SocialMediaAccount $socialMediaAccount */

?>




<div class="section">
    <div id="responsive-table" class="card card card-default scrollspy">
        <div class="card-content">
            <div class="row right-align">
          <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Drop Me!</a>
  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
  <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
  <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
  </ul>
    </div>
            <div class="row">
                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th data-field="name">{{ __('Usuário') }}</th>
                        <th data-field="status">{{ __('Seguidores') }}</th>
                        <th data-field="status">{{ __('Seguindo') }}</th>
                        <th data-field="status">{{ __('Publicações') }}</th>
                        <th data-field="status">{{ __('Ações') }}</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($socialMediaAccounts->all() as $socialMediaAccount)
                        <tr>
                            <td><i class="fab fa-{{ $socialMediaAccount->social_media->slug }} fa-2x"></i><a href="https://www.instagram.com/{{ $socialMediaAccount->username }}" target="_blank"><span class="text uppercase">{{ $socialMediaAccount->username }}</span></a></td>
                            <td>999.999.99</td>
                            <td>999.999.99</td>
                            <td>999.999.99</td>
                            <td>
                                <a href="{{ route('settings.social_medias.instagram.edit', [$socialMediaAccount->id]) }}">
                                    <i class="fa fa-edit fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>