<?php
function validateSlug(string $uri): array
{
  $parts = explode('/', trim($uri, '/'));

  if (count($parts) !== 1) {
    return ['data' => null, 'errors' => ['Format d\'URL invalide. Utilisez /alarme']];
  }

  if ($parts[0] !== "alarme") {
    return ['data' => null, 'errors' => ["La valeur '$parts[0]' doit être 'alarme'."]];
  } else {
    return ['data' => $parts[0], 'errors' => []];
  }
}
