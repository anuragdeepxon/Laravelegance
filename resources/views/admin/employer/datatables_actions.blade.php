{!! Form::open(['url' => ['admin/employer/delete', $id], 'method' => 'delete']) !!}
<div class='flex justify-between items-center'>
    <a href="{{ url('admin/employer/show/' . $id) }}" class='m-1
    rounded-full p-2
    text-blue-800

     '>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ url('admin/employer/edit/' . $id) }}" class='m-1
    rounded-full p-2
    text-green-700
     '>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'm-1
             rounded-full p-2
             text-red-700

             ',
        'onclick' => "return confirm('Are you sure?')",
    ]) !!}
</div>
{!! Form::close() !!}
