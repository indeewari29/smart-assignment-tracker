% Facts: what stress levels and deadlines exist
stress(high).
stress(medium).
stress(low).

deadline(very_close).  % 0-2 days
deadline(close).       % 3-7 days
deadline(far).         % 8+ days

% Rules: if stress and deadline match, give suggestion
suggestion(high, very_close, "You've recorded lower energy while a deadline is very close. Some people find these steps healpful:<br><br>Close your eyes, breathe in for 4 seconds, out for 6.<br><br>Have a small talk with someone.<br><br>Read ONLY the title, grab the idea.").

suggestion(high, close, "You've recorded lower energy, but you have some time. <br><br>Step away for 10 minutes.<br><br>Drink some water.<br<br>Work for only 15 minutes.").

suggestion(high, far, "You've recorded lower energy. Some people find these steps helpful:<br><br>Stand up and stretch.<br><br>Take 5 slow breaths.<br><br>Add ONE subtask you can do tomorrow.").

suggestion(medium, very_close, "You're managing, but the deadline is close. These steps might help:<br><br>Work for 20 minutes, rest for 5. <br><br>Put phone on silent, close extra tabs. <br><br>Take a water break.").

suggestion(medium, close, "You're aware of what's ahead. Spend 5 minutes planning today:<br><br>Pick the trickiesttask first.<br><br>Stick to the plan you have made.<br><br>Take regular breaks.").

suggestion(medium, far, "You're in a steady place. These steps might help more:<br><br>Pick one small task, do it for 10 minutes.<br><br>Take a proper break.<br><br>Check the next step in your plan.").

suggestion(low, very_close, "You've tracked good energy while a deadline soon. Here is a boost:<br><br>Work for 25 minutes, take a 5-minute break.<br><br>Break down the biggest task on the way. <br><br>Repeat until you meet daily goal.").

suggestion(low, close, "You're in a great space. Here is a boost for you: <br><br>Spend 15 minutes on next week's tasks. <br><br>Add one new assignment. <br><br>Reward yourself, use this energy wisely.").

suggestion(low, far, "You're doing well. Here is a boost:<br><br>Pick an assignment you've been avoiding. <br><br>Work for 15 minutes, take a break. <br>br>Plan the next step.").

% Query predicate
get_suggestion(Stress, Days, Message) :-
    (Days =< 2 -> DeadlineStatus = very_close
    ; Days =< 7 -> DeadlineStatus = close
    ; DeadlineStatus = far),
    suggestion(Stress, DeadlineStatus, Message).