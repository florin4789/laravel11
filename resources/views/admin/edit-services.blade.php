<form method="POST" action="{{ route('admin.edit.services') }}">
    @csrf
    <textarea name="content" id="editor">{{ old('content') }}</textarea>
    <button type="submit">Save</button>
</form>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
