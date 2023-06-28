<div class="qty">
    @php
    $get_latest = DB::table("wishlists")->where('user_id', Auth::id())->get();
 @endphp
    {{ ($get_latest->count()) }}
</div>
