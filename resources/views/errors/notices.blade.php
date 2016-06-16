@if ( $status = session()->get('success') )
    <div class="alert alert--success">
        {{ $status }}
    </div>
@elseif ( $status = session()->get('notice') )
    <div class="alert alert--notice">
        {{ $status }}
    </div>
@elseif ( $status = session()->get('warning') )
    <div class="alert alert--warning">
        {{ $status }}
    </div>
@endif

@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert--warning">
        <p><strong>Whoops! Something went wrong!</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif