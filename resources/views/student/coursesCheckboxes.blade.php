@foreach ($coursesForCheckboxes as $id => $title)
    <input
        type='checkbox'
        value='{{ $id }}'
        name='courses[]'
        {{ (isset($coursesForThisStudent) and in_array($title, $coursesForThisStudent)) ? 'CHECKED' : '' }}
    >
    {{ $title }} <br>
@endforeach
