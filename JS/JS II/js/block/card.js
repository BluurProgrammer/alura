
var $wrapCard = document.querySelector('.wrap-card');
var $cardColors = document.querySelectorAll('.card-colors');

	$wrapCard.addEventListener('click', function(event){
		var $this = event.target;
		var $card = $this.parentNode.parentNode.parentNode;
		var $cardContent = $card.querySelector('.card-content');

		if ($this.classList.contains('card-colors')) {	
			$card.dataset.color = $this.dataset.color;

			for (var j = 0; j < $cardColors.length; j++) {
				$cardColors[j].classList.remove('isActive');
			}
		};

		$this.classList.add('isActive');

		if ($this.classList.contains('card_delete')) {
			$card.remove();
		};

		if ($this.classList.contains('card_edit')) {
			if ($cardContent.getAttribute('contenteditable') == 'false') {
				$cardContent.setAttribute('contenteditable', 'true');
				$cardContent.focus();
				$this.classList.add('isActive');
			} else {
			$cardContent.setAttribute('contenteditable', 'false');
			$cardContent.blur();
			$this.classList.remove('isActive');
			};
		} 
	});
