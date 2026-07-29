<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>ダッシュボード</title>

    {{-- アイコンを使うための読み込み --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    {{-- dashboard.cssを読み込む --}}
    @vite('resources/css/dashboard.css')
</head>

<body>

    {{-- 画面全体 --}}
    <div class="layout">

    {{-- 左側のメニュー --}}
    <aside class="sidebar">

    <div>

    {{-- アプリ名 --}}
    <h2>
    <i class="bi bi-wallet2"></i>
    Shift Money
    </h2>

    {{-- メニュー --}}
        <nav>

        <a href="{{ route('dashboard') }}">
        <i class="bi bi-house"></i>
        ホーム
        </a>

        <a href="#">
        <i class="bi bi-cash-coin"></i>
        収支入力
        </a>

        <a href="#">
        <i class="bi bi-bar-chart"></i>
        月別収支
        </a>

        <a href="#">
        <i class="bi bi-piggy-bank"></i>
        貯金目標
        </a>
        </nav>
            </div>


            {{-- サイドバーの一番下 --}}
        <div class="sidebar-bottom">

            {{-- ログインしている人の名前 --}}
            <p>
            {{ Auth::user()->name }}
            </p>

            {{-- ログアウトボタン --}}
            <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">
            <i class="bi bi-box-arrow-left"></i>
            ログアウト
            </button>
            </form>
            </div>
    </aside>

                {{-- 右側の画面 --}}
                <main class="main">
                <h1>ダッシュボード</h1>

                <p class="message">
                現在の収支状況を確認できます。
                </p>

        {{-- 4つの金額カード --}}
                <div class="cards">

                <div class="card">
                <p>今月のシフト収入</p>
                <h2>0円</h2>
                </div>

                <div class="card">
                <p>今月のボーナス</p>
                <h2>0円</h2>
                </div>

                <div class="card">
                <p>今月の浪費</p>
                <h2>0円</h2>
                </div>

                <div class="card">
                <p>現在の貯金額</p>
                <h2>0円</h2>
                </div>

            </div>

                    {{-- 下の大きな場所 --}}
                    <div class="content">

                    <h2>Shift Money</h2>
                    <p>
                    ここにカレンダーを追加します。
                    </p>
                    </div>

        </main>

    </div>

</body>

</html>