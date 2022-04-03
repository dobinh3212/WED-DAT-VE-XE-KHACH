@if (request()->get('pack_id') > 0 && request()->get('theme_id') > 0)
<ul class="steps">
    <li class="step step-active">
        <div class="step-content">
            <div class="step-circle" style="z-index: 199990000 !important;">1</div>
            <span class="step-text">Chọn giao diện</span>
        </div>
    </li>
    <li class="step step-active">
        <div class="step-content">
            <div class="step-circle">2</div>
            <span class="step-text">Chọn gói website</span>
        </div>
    </li>
    <li class="step">
        <div class="step-content">
            <div class="step-circle">3</div>
            <span class="step-text">Hoàn thành</span>
        </div>
    </li>
</ul>
@endif

@if (request()->get('pack_id') > 0 && request()->get('theme_id') == 0)
<ul class="steps">
    <li class="step step-active">
        <div class="step-content">
            <div class="step-circle" style="z-index: 199990000 !important;">1</div>
            <span class="step-text">Chọn gói website</span>
        </div>
    </li>
    <li class="step step-success">
        <div class="step-content">
            <div class="step-circle">2</div>
            <span class="step-text">Chọn giao diện</span>
        </div>
    </li>
    <li class="step">
        <div class="step-content">
            <div class="step-circle">3</div>
            <span class="step-text">Hoàn thành</span>
        </div>
    </li>
</ul>
@endif


@if (request()->get('pack_id') == 0 && request()->get('theme_id') > 0)
<ul class="steps">
    <li class="step step-active">
        <div class="step-content">
            <div class="step-circle" style="z-index: 199990000 !important;">1</div>
            <span class="step-text">Chọn giao diện</span>
        </div>
    </li>
    <li class="step step-success">
        <div class="step-content">
            <div class="step-circle">2</div>
            <span class="step-text">Chọn gói website</span>
        </div>
    </li>
    <li class="step">
        <div class="step-content">
            <div class="step-circle">3</div>
            <span class="step-text">Hoàn thành</span>
        </div>
    </li>
</ul>
@endif