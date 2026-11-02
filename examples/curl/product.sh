#!/usr/bin/env bash
# Carrefour Product API – cURL example
# Usage: PILOTERR_API_KEY=your-key ./product.sh
set -euo pipefail

curl -sS --fail-with-body -G "https://api.piloterr.com/v2/carrefour/product" \
  -H "x-api-key: ${PILOTERR_API_KEY}" \
  --data-urlencode query=https://www.carrefour.fr/p/oeufs-de-caille-le-gaulois-3266980075934
