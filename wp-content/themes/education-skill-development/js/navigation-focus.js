var education_skill_development_keyboard_navigation_loop = function (elem) {
  var education_skill_development_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var education_skill_development_firstTabbable = education_skill_development_tabbable.first();
  var education_skill_development_lastTabbable = education_skill_development_tabbable.last();
  education_skill_development_firstTabbable.focus();

  education_skill_development_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      education_skill_development_firstTabbable.focus();
    }
  });

  education_skill_development_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      education_skill_development_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};