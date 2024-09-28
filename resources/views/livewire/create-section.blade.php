<!-- Modal -->
<div class="modal fade" id="course-{{$course->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> أقسام {{$course->title}} </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit="saveSection">
                    <input type="text" wire:model="name">
                    <div>
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <input type="text" wire:model="description">
                    <div>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
{{--                <button type="button" class="btn btn-primary">حفظ</button>--}}
            </div>
        </div>
    </div>
</div>
