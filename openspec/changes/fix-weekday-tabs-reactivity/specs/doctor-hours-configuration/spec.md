## MODIFIED Requirements

### Requirement: Weekday Tabs Interactivity
The system SHALL provide interactive, clickable tabs for each day of the week in the doctor hours configuration panel.

#### Scenario: User selects a different day
- **WHEN** the user clicks on a weekday tab (e.g., "Martes") that is not currently active
- **THEN** the selected tab becomes visually highlighted as active (using primary color border and text)
- **AND THEN** the other weekday tabs are visually represented as inactive (using gray styling)
- **AND THEN** the state updates to reflect the newly selected day without reloading the form

#### Scenario: Active day styling
- **WHEN** a day is the currently selected day
- **THEN** its UI tab is clearly distinct from unselected days using standard active-tab design tokens (such as `border-cyan-500` and `text-cyan-600`)
