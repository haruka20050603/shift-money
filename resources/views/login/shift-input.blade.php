<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>家計簿アプリ</title>

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    @vite(['resources/css/shift-input.css', 
    'resources/js/shift-input.js'])

</head>

<body>

<div class="container">

    <!-- =========================
  シフト・浪費・ボーナスタブ
    ========================== -->
        <div class="card">
    <div class="tabs main-tabs">

        <button
            id="shiftTab"
            class="tab active"
            type="button"
        >
            <i class="bi bi-calendar-check"></i>
            シフト
        </button>

        <button
            id="expenseTab"
            class="tab"
            type="button"
        >
            <i class="bi bi-cart-x"></i>
            浪費
        </button>

        <button
            id="bonusTab"
            class="tab"
            type="button"
        >
            <i class="bi bi-gift"></i>
            ボーナス
        </button>

    </div>


    <!-- =========================
　　　シフト入力画面
    ========================== -->
    <form method="POST" action="{{ route('shift.store') }}">
        @csrf
        <div id="shiftForm" class="tab-content">



            <h1 class="title">
                <i class="bi bi-calendar-check"></i>
                シフト管理

            </h1>


            <!-- 日付 -->

            <div class="box">
                <label
                    class="label"
                    for="workDate"
                >
                    <i class="bi bi-calendar-event"></i>
                    日付
                </label>

                <input
                    id="workDate"
                    class="input"
                    type="date"
                    value="{{ request()->query('date') }}"
                    name="workDate"
                >

            </div>


            <!-- 出勤時間・退勤時間 -->

            <div class="shift-times">

                <!-- 出勤時間 -->

                <div class="box">
                    <label
                        class="label"
                        for="startTime"
                    >
                        <i class="bi bi-box-arrow-in-right"></i>

                        出勤時間
                    </label>

                    <div class="time-row">

                        <input
                            id="startTime"
                            class="input"
                            type="number"
                            placeholder="時"
                            min="0"
                            max="23"
                            name="startTime"
                            onwheel="this.blur();"
                        >

                        <span class="time-colon">：</span>

                        <input
                            id="startminute"
                            class="input"
                            type="number"
                            placeholder="分"
                            min="0"
                            max="59"
                            name="startminute"
                            onwheel="this.blur();"
                        >

                    </div>

                </div>


                <!-- 退勤時間 -->

                <div class="box">

                    <label
                        class="label"
                        for="endTime"
                    >
                        <i class="bi bi-box-arrow-left"></i>

                        退勤時間
                    </label>

                    <div class="time-row">

                        <input
                            id="endTime"
                            class="input"
                            type="number"
                            placeholder="時"
                            min="0"
                            max="23"
                            name="endTime"
                            onwheel="this.blur();"
                            name="endTime"
                        >

                        <span class="time-colon">：</span>

                        <input
                            id="endminute"
                            class="input"
                            type="number"
                            placeholder="分"
                            min="0"
                            max="59"
                            name="endminute"
                            onwheel="this.blur();"
                            name="endminute"
                        >

                    </div>

                </div>

            </div>


            <!-- 時給 -->

            <div class="box">

                <label
                    class="label"
                    for="wage"
                >
                    <i class="bi bi-cash-stack"></i>

                    時給
                </label>

                <input
                    id="wage"
                    class="input"
                    type="number"
                    placeholder="例：1160"
                    min="0"
                    onwheel="this.blur();"
                    name="wage"
                >

            </div>


            <!-- 休憩時間 -->

            <div class="box">

                <label
                    class="label"
                    for="breakTime"
                >
                    <i class="bi bi-cup-hot"></i>

                    休憩時間
                </label>

                <div class="time-row">

                    <input
                        id="breakTime"
                        class="input"
                        type="number"
                        placeholder="時間"
                        min="0"
                        onwheel="this.blur();"
                        name="breakTime"
                    >

                    <span class="time-colon">：</span>

                    <input
                        id="breakminute"
                        class="input"
                        type="number"
                        placeholder="分"
                        min="0"
                        max="59"
                        onwheel="this.blur();"
                        name="breakminute"
                        >

                </div>

            </div>


            <!-- 保存ボタン -->

            <div class="buttons">

                <button id="saveButton" class="btn save" type="submit">
                    <i class="bi bi-floppy"></i>

                    保存
                </button>
            </div>
        </div>
        </form> 




    <!-- =========================
    浪費入力画面
    ========================== -->
<form method="POST" action="{{ route('expenses.store') }}">
    @csrf
    <div id="expenseForm" class="tab-content" style="display: none;">

       

            <h1 class="title">
                <i class="bi bi-cart-x"></i>
                浪費入力
            </h1>


            <!-- 浪費日 -->

            <div class="box">

                <label
                    class="label"
                    for="rouhiDate"
                >
                    <i class="bi bi-calendar-event"></i>

                    日付
                </label>

                <input
                    id="rouhiDate"
                    name="rouhiDate"
                    class="input"
                    type="date"
                    value="{{ request()->query('date') }}"
                >

            </div>


            <!-- 浪費金額 -->

            <div class="box">

                <label
                    class="label"
                    for="rouhiTotal"
                >
                    <i class="bi bi-cash"></i>

                    浪費金額
                </label>

                <input
                    id="rouhiTotal"
                    class="input"
                    type="number"
                    placeholder="例：3000"
                    min="0"
                    name="rouhiTotal"
                    onwheel="this.blur();"
                >

            </div>


            <!-- 浪費メモ -->

            <div class="box">

                <label
                    class="label"
                    for="rouhiMemo"
                >
                    <i class="bi bi-pencil-square"></i>

                    メモ
                </label>

                <textarea
                    id="rouhiMemo"
                    class="input textarea"
                    name="rouhiMemo"
                    rows="4"
                    placeholder="何に使ったか入力"
                ></textarea>

            </div>


            <!-- 浪費入力ボタン -->

            <div class="buttons">

                <button
                    id="rouhiButton"
                    class="btn expense"
                    type="submit"
                >
                    <i class="bi bi-plus-circle"></i>

                    入力
                </button>
            </div>
        </div>
        </form>
  


    <!-- =========================
        ボーナス入力画面
    ========================== -->
<form method="POST" action="{{ route('bonus.store') }}">
    @csrf
    <div id="bonusForm" class="tab-content" style="display: none;">
            <h1 class="title">

                <i class="bi bi-gift"></i>

                ボーナス入力

            </h1>


            <!-- ボーナス日 -->

            <div class="box">

                <label
                    class="label"
                    for="bounusDate"
                >
                    <i class="bi bi-calendar-event"></i>

                    日付
                </label>

                <input
                    id="bounusDate"
                    class="input"
                    type="date"
                    value="{{ request()->query('date') }}"
                    name="bounusDate"
                >

            </div>


            <!-- ボーナス金額 -->

            <div class="box">

                <label
                    class="label"
                    for="bounusTotal"
                >
                    <i class="bi bi-cash-stack"></i>

                    ボーナス金額
                </label>

                <input
                    id="bounusTotal"
                    class="input"
                    type="number"
                    placeholder="例：5000"
                    min="0"
                    onwheel="this.blur();"
                    value="{{ old('bounusTotal') }}"
                    name="bounusTotal"
                >

            </div>


            <!-- ボーナスメモ -->

            <div class="box">

                <label
                    class="label"
                    for="bounusMemo"
                >
                    <i class="bi bi-pencil-square"></i>

                    メモ
                </label>

                <textarea
                    id="bounusMemo"
                    class="input textarea"
                    rows="4"
                    placeholder="ボーナスの内容を入力"
                    name="bounusMemo"
                ></textarea>

            </div>


            <!-- ボーナス入力ボタン -->

            <div class="buttons">

            <button id="bounusButton" class="btn bonus" type="submit">
            <i class="bi bi-plus-circle"></i>
            入力
            </button>
            </div>
        </div>
    </form>
    </div>

</div>


</body>
</html>