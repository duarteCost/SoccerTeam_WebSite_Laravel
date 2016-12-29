@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/helpStyle.css" >
    <title>FC ajuda</title>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Tem alguma questão? contacte-nos!</h2>
            <hr>
            <form action="{{ url('help') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group-email">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group-subject">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group-message">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
                </div>

                <input id="button" type="submit" value="Send Message" class="btn btn-success">
            </form>
        </div>
    </div>
    {{--<p id="helpP">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vehicula tortor in felis laoreet condimentum. Morbi tempus hendrerit tincidunt. Aliquam egestas justo eleifend, iaculis neque eu, pulvinar orci. Quisque ultricies eleifend magna at viverra. Quisque rhoncus pellentesque lectus et cursus. Donec scelerisque id sem sed gravida. Nulla tincidunt, dolor ut laoreet pharetra, diam lacus faucibus tellus, sit amet tristique nisl lectus in tortor. Sed placerat bibendum eleifend. Vestibulum finibus nisi eget orci rutrum, a pellentesque velit hendrerit. Maecenas justo turpis, vehicula in mollis at, consequat a sem. Aliquam sodales ac libero sit amet ultricies. Nulla id imperdiet quam. Curabitur mattis ornare mi, nec vehicula ex consequat nec. Proin tempor ultrices metus, in lacinia massa suscipit at.

    Nam id dignissim nulla. Suspendisse varius nisl eget eros vehicula lobortis. In hac habitasse platea dictumst. Proin magna ligula, ullamcorper sed aliquam in, varius ac erat. Pellentesque feugiat purus id lacus fermentum, vel cursus turpis suscipit. Aenean tellus metus, commodo mattis pulvinar auctor, tristique sit amet eros. Sed bibendum, sapien nec malesuada rutrum, dolor arcu pretium tellus, quis dictum dolor tortor vel ligula. Vivamus odio ipsum, dictum ut tempus vel, congue id orci. Donec leo sem, rhoncus ut felis et, dictum mollis dui. Pellentesque viverra velit quis dolor rutrum, blandit ullamcorper tellus molestie. Sed feugiat sapien vitae sem ultrices egestas. In nec convallis neque, interdum elementum risus.

    Quisque libero eros, dictum sed gravida ut, rutrum eu turpis. Donec ut aliquam tellus, in porta quam. Maecenas condimentum vitae orci eget laoreet. In eget dolor id augue placerat elementum. Aliquam accumsan, tellus euismod faucibus sodales, felis lorem ullamcorper felis, in commodo velit risus eget arcu. Suspendisse et turpis elementum, rutrum metus eget, varius est. Maecenas in ex libero. Proin id ornare ante. Donec condimentum hendrerit odio, ac vulputate erat eleifend eu. Integer hendrerit, risus sit amet volutpat fringilla, leo odio bibendum tellus, et feugiat nunc elit ut magna. Mauris mattis eros ultrices, sagittis tortor id, tristique odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean in leo ac lacus egestas ultricies vitae eu nisl. Aenean in consequat augue, et efficitur tellus. Sed et ipsum sed elit semper aliquam.

    Curabitur in aliquet lectus, sed vulputate nibh. Nulla id urna tortor. Integer consequat semper felis nec laoreet. Vestibulum tempus porta convallis. Duis ut lorem in justo porttitor dignissim a eu mauris. Aenean nulla diam, tempor venenatis ipsum at, vehicula aliquam dui. Vestibulum venenatis, libero laoreet faucibus maximus, orci felis ullamcorper leo, id ullamcorper elit elit porta odio.

    Proin ultricies condimentum neque, ac gravida mauris porta vel. Sed massa ex, porta id molestie malesuada, egestas in justo. Duis egestas nec ex quis dignissim. Nam scelerisque nec risus id efficitur. Curabitur aliquet magna quis felis tincidunt sodales. Nam nec arcu tincidunt risus tempor consectetur. Vestibulum varius volutpat libero, id tincidunt tortor semper in. Fusce malesuada ultricies feugiat. Vivamus dictum justo id dui dapibus, vitae ullamcorper ante luctus. Donec eu ligula at dui rhoncus gravida. Proin euismod, velit et sodales aliquet, eros orci porta orci, a tristique lectus libero id ex. Nunc laoreet ultrices eros vel sollicitudin. Sed fermentum ac elit id efficitur. Sed consectetur tempus scelerisque. Aenean ipsum nisi, fringilla a gravida et, blandit ac orci.

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vehicula tortor in felis laoreet condimentum. Morbi tempus hendrerit tincidunt. Aliquam egestas justo eleifend, iaculis neque eu, pulvinar orci. Quisque ultricies eleifend magna at viverra. Quisque rhoncus pellentesque lectus et cursus. Donec scelerisque id sem sed gravida. Nulla tincidunt, dolor ut laoreet pharetra, diam lacus faucibus tellus, sit amet tristique nisl lectus in tortor. Sed placerat bibendum eleifend. Vestibulum finibus nisi eget orci rutrum, a pellentesque velit hendrerit. Maecenas justo turpis, vehicula in mollis at, consequat a sem. Aliquam sodales ac libero sit amet ultricies. Nulla id imperdiet quam. Curabitur mattis ornare mi, nec vehicula ex consequat nec. Proin tempor ultrices metus, in lacinia massa suscipit at.

    Nam id dignissim nulla. Suspendisse varius nisl eget eros vehicula lobortis. In hac habitasse platea dictumst. Proin magna ligula, ullamcorper sed aliquam in, varius ac erat. Pellentesque feugiat purus id lacus fermentum, vel cursus turpis suscipit. Aenean tellus metus, commodo mattis pulvinar auctor, tristique sit amet eros. Sed bibendum, sapien nec malesuada rutrum, dolor arcu pretium tellus, quis dictum dolor tortor vel ligula. Vivamus odio ipsum, dictum ut tempus vel, congue id orci. Donec leo sem, rhoncus ut felis et, dictum mollis dui. Pellentesque viverra velit quis dolor rutrum, blandit ullamcorper tellus molestie. Sed feugiat sapien vitae sem ultrices egestas. In nec convallis neque, interdum elementum risus.

    Quisque libero eros, dictum sed gravida ut, rutrum eu turpis. Donec ut aliquam tellus, in porta quam. Maecenas condimentum vitae orci eget laoreet. In eget dolor id augue placerat elementum. Aliquam accumsan, tellus euismod faucibus sodales, felis lorem ullamcorper felis, in commodo velit risus eget arcu. Suspendisse et turpis elementum, rutrum metus eget, varius est. Maecenas in ex libero. Proin id ornare ante. Donec condimentum hendrerit odio, ac vulputate erat eleifend eu. Integer hendrerit, risus sit amet volutpat fringilla, leo odio bibendum tellus, et feugiat nunc elit ut magna. Mauris mattis eros ultrices, sagittis tortor id, tristique odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean in leo ac lacus egestas ultricies vitae eu nisl. Aenean in consequat augue, et efficitur tellus. Sed et ipsum sed elit semper aliquam.

    Curabitur in aliquet lectus, sed vulputate nibh. Nulla id urna tortor. Integer consequat semper felis nec laoreet. Vestibulum tempus porta convallis. Duis ut lorem in justo porttitor dignissim a eu mauris. Aenean nulla diam, tempor venenatis ipsum at, vehicula aliquam dui. Vestibulum venenatis, libero laoreet faucibus maximus, orci felis ullamcorper leo, id ullamcorper elit elit porta odio.

    Proin ultricies condimentum neque, ac gravida mauris porta vel. Sed massa ex, porta id molestie malesuada, egestas in justo. Duis egestas nec ex quis dignissim. Nam scelerisque nec risus id efficitur. Curabitur aliquet magna quis felis tincidunt sodales. Nam nec arcu tincidunt risus tempor consectetur. Vestibulum varius volutpat libero, id tincidunt tortor semper in. Fusce malesuada ultricies feugiat. Vivamus dictum justo id dui dapibus, vitae ullamcorper ante luctus. Donec eu ligula at dui rhoncus gravida. Proin euismod, velit et sodales aliquet, eros orci porta orci, a tristique lectus libero id ex. Nunc laoreet ultrices eros vel sollicitudin. Sed fermentum ac elit id efficitur. Sed consectetur tempus scelerisque. Aenean ipsum nisi, fringilla a gravida et, blandit ac orci.

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vehicula tortor in felis laoreet condimentum. Morbi tempus hendrerit tincidunt. Aliquam egestas justo eleifend, iaculis neque eu, pulvinar orci. Quisque ultricies eleifend magna at viverra. Quisque rhoncus pellentesque lectus et cursus. Donec scelerisque id sem sed gravida. Nulla tincidunt, dolor ut laoreet pharetra, diam lacus faucibus tellus, sit amet tristique nisl lectus in tortor. Sed placerat bibendum eleifend. Vestibulum finibus nisi eget orci rutrum, a pellentesque velit hendrerit. Maecenas justo turpis, vehicula in mollis at, consequat a sem. Aliquam sodales ac libero sit amet ultricies. Nulla id imperdiet quam. Curabitur mattis ornare mi, nec vehicula ex consequat nec. Proin tempor ultrices metus, in lacinia massa suscipit at.

    Nam id dignissim nulla. Suspendisse varius nisl eget eros vehicula lobortis. In hac habitasse platea dictumst. Proin magna ligula, ullamcorper sed aliquam in, varius ac erat. Pellentesque feugiat purus id lacus fermentum, vel cursus turpis suscipit. Aenean tellus metus, commodo mattis pulvinar auctor, tristique sit amet eros. Sed bibendum, sapien nec malesuada rutrum, dolor arcu pretium tellus, quis dictum dolor tortor vel ligula. Vivamus odio ipsum, dictum ut tempus vel, congue id orci. Donec leo sem, rhoncus ut felis et, dictum mollis dui. Pellentesque viverra velit quis dolor rutrum, blandit ullamcorper tellus molestie. Sed feugiat sapien vitae sem ultrices egestas. In nec convallis neque, interdum elementum risus.

    Quisque libero eros, dictum sed gravida ut, rutrum eu turpis. Donec ut aliquam tellus, in porta quam. Maecenas condimentum vitae orci eget laoreet. In eget dolor id augue placerat elementum. Aliquam accumsan, tellus euismod faucibus sodales, felis lorem ullamcorper felis, in commodo velit risus eget arcu. Suspendisse et turpis elementum, rutrum metus eget, varius est. Maecenas in ex libero. Proin id ornare ante. Donec condimentum hendrerit odio, ac vulputate erat eleifend eu. Integer hendrerit, risus sit amet volutpat fringilla, leo odio bibendum tellus, et feugiat nunc elit ut magna. Mauris mattis eros ultrices, sagittis tortor id, tristique odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean in leo ac lacus egestas ultricies vitae eu nisl. Aenean in consequat augue, et efficitur tellus. Sed et ipsum sed elit semper aliquam.

    Curabitur in aliquet lectus, sed vulputate nibh. Nulla id urna tortor. Integer consequat semper felis nec laoreet. Vestibulum tempus porta convallis. Duis ut lorem in justo porttitor dignissim a eu mauris. Aenean nulla diam, tempor venenatis ipsum at, vehicula aliquam dui. Vestibulum venenatis, libero laoreet faucibus maximus, orci felis ullamcorper leo, id ullamcorper elit elit porta odio.

    Proin ultricies condimentum neque, ac gravida mauris porta vel. Sed massa ex, porta id molestie malesuada, egestas in justo. Duis egestas nec ex quis dignissim. Nam scelerisque nec risus id efficitur. Curabitur aliquet magna quis felis tincidunt sodales. Nam nec arcu tincidunt risus tempor consectetur. Vestibulum varius volutpat libero, id tincidunt tortor semper in. Fusce malesuada ultricies feugiat. Vivamus dictum justo id dui dapibus, vitae ullamcorper ante luctus. Donec eu ligula at dui rhoncus gravida. Proin euismod, velit et sodales aliquet, eros orci porta orci, a tristique lectus libero id ex. Nunc laoreet ultrices eros vel sollicitudin. Sed fermentum ac elit id efficitur. Sed consectetur tempus scelerisque. Aenean ipsum nisi, fringilla a gravida et, blandit ac orci.
    </p>--}}
@stop
@section('footer')
@stop