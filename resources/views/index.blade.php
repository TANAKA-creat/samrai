<x-layout>
    <x-slot name="title">
        @foreach($users as $user)
        業務日報 - {{ users->name}}
        @endforeach
    </x-slot>

    <h1>
        @foreach($users as $user)
        <span>{{ user->name }}</span>
        @endforeach

        <span class="current-time"><?php echo date('Y年m月d日    - H:i:s (l)'); ?></span>
        <a href="{{ route('posts.create') }}">
            [日報を書く]
        </a>
    </h1>
    <div class="advice">
    <p class="advice1">記録日</p>
    <p class="advice2">記録日をクリックすると編集と削除ページに遷移します</p>
    </div>
    <ul>
        @forelse($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </li>
        @empty
            <li>記録がありません</li>
        @endforelse
    </ul>
</x-layout>

