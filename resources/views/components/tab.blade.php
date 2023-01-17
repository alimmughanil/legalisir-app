@props(['type', 'head', 'body'])
@dump($head)
@if ($type == 'vertical')
    <div class="flex items-start">
        <ul class="flex flex-col flex-wrap pl-0 mr-4 list-none border-b-0 nav nav-tabs" id="tabs-tabVertical"
            role="tablist">
            @foreach ($head as $tabTitle)
                <li class="flex-grow text-center nav-item" role="presentation">
                    <a href="#tabs-{{ $tabTitle }}"
                        class="block px-6 py-3 my-2 text-xs font-medium leading-tight uppercase border-t-0 border-b-2 border-transparent nav-link border-x-0 hover:border-transparent hover:bg-gray-100 focus:border-transparent active"
                        id="tabs-home-tabVertical" tabTitle-bs-toggle="pill"
                        tabTitle-bs-target="#tabs-{{ $tabTitle }}" role="tab"
                        aria-controls="tabs-{{ $tabTitle }}" aria-selected="true">{{ $tabTitle }}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="tabs-tabContentVertical">
            <div class="tab-pane fade show active" id="tabs-homeVertical" role="tabpanel"
                aria-labelledby="tabs-home-tabVertical">
                Tab 1 content vertical
            </div>
            <div class="tab-pane fade" id="tabs-profileVertical" role="tabpanel"
                aria-labelledby="tabs-profile-tabVertical">
                Tab 2 content vertical
            </div>
            <div class="tab-pane fade" id="tabs-messagesVertical" role="tabpanel"
                aria-labelledby="tabs-profile-tabVertical">
                Tab 3 content vertical
            </div>
        </div>
    </div>
@endif
