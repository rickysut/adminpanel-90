@if(session('status'))
{{-- success --}}
    <section id="basic-alerts">
        <div class="demo-spacing-0">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    <i class="fa fa-check-circle"></i>
                    <strong>Good Morning!</strong>
                    {{ session('status') }} This alert should only shown when needed.
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </section>

{{-- fail --}}
@elseif (session('status'))
<section id="basic-alerts">
    <div class="demo-spacing-0">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <i class="fas fa-exclamation-circle fa"></i>
                <strong>Good Morning!</strong>
                {{ session('status') }} This alert should only shown when needed.
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</section>
@endif

<section id="basic-alerts">
    <div class="demo-spacing-0 mb-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <i class="fas fa-exclamation-circle"></i>
                <strong>Good Morning!</strong>
                {{ session('status') }} This alert should only shown when needed. You can modify this alert at partials.alert.
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</section>
