FROM node:alpine

WORKDIR /app

# Install http-server globally
RUN npm install
RUN npm install -g http-server

# Copy HTML file
COPY index.html .

# Expose port 8080
EXPOSE 8080

# Start the server
CMD ["http-server", "-p", "8080"]