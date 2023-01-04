<div wire:ignore>
    <input id="{{ $trixId }}" type="hidden" name="content" value="{{ $value }}">
    <trix-editor wire:ignore input="{{ $trixId }}"></trix-editor>

    <script>
      var trixEditor = document.getElementById("{{ $trixId }}")

      const debounce = function(fn, d = 400) {
        let timer;
        return function() {
          let context = this;
          let args = arguments;
          clearTimeout(timer);
          timer = setTimeout(() => {
            fn.apply(context, args);
          }, d);
        }
      }

      addEventListener("trix-change", debounce(() => {
        @this.set('value', trixEditor.getAttribute('value'));
      }))
    </script>
</div>


