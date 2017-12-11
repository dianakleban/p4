
  @foreach ($coursesForCheckboxes as $id => $title)
      <input
          type='checkbox'
          value='{{ $id }}'
          name='courses[]'
          id='courses_{{ $id }}'
          {{ (isset($coursesForThisStudent) and in_array($title, $coursesForThisStudent)) ? 'CHECKED' : '' }}
      >
      <label for='courses_{{ $id }}'>{{ $title }}</label><br>
  @endforeach
