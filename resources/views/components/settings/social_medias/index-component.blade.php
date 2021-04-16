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
                <table class="responsive-table Highlight">
                    <thead>
                    <tr>
                        <th data-field=""></th>
                        <th data-field="name">{{ __('Usuário') }}</th>
                        <th data-field="status">{{ __('Seguidores') }}</th>
                        <th data-field="status">{{ __('Seguindo') }}</th>
                        <th data-field="status">{{ __('Publicações') }}</th>
                        <th data-field="status">{{ __('Tags') }}</th>
                        <th data-field="status">{{ __('Ações') }}</th>
                    </tr>
                    </thead>
                    <tbody class="tab-content">


                    @foreach($socialMediaAccounts->all() as $socialMediaAccount)
                        <tr>
                            <td class="center-align"><img class="circle" width="20%" src="{{ $socialMediaAccount->data->user->profile_pic_url }}" alt="">

                            </td>
                            <td><a href="https://www.instagram.com/{{ $socialMediaAccount->username }}" target="_blank">
                                    <span class="text uppercase">{{ $socialMediaAccount->username }}
                                    </span>
                                </a></td>
                            <td>{{ number_format($socialMediaAccount->data->user->follower_count, thousands_separator: '.') }}</td>
                            <td>{{ number_format($socialMediaAccount->data->user->following_count, thousands_separator: '.') }}</td>
                            <td>{{ number_format($socialMediaAccount->data->user->media_count, thousands_separator: '.') }}</td>
                            <td>{{ number_format($socialMediaAccount->data->user->following_tag_count, thousands_separator: '.') }}</td>

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