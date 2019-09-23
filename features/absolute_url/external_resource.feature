@absoluteUrl @externalResource
Feature: IRI should change for external resources
  In order to add detail to IRIs
  Include the absolute url for external resources

  @createSchema
  Scenario: External Resources should support hostnames and routes separate from the API
    Given there are 1 externalResource objects
    And I add "Accept" header equal to "application/ld+json"
    And I add "Content-Type" header equal to "application/json"
    And I send a "GET" request to "/external_dummies"
    And print last JSON response
    And the JSON should be equal to:
    """
    {
      "@context": "\/contexts\/ExternalDummy",
      "@id": "http:\/\/example.com\/external_dummies",
      "@type": "hydra:Collection",
      "hydra:member": [
        {
          "@id": "http:\/\/example.com\/external_dummies\/1",
          "@type": "ExternalDummy",
          "externalResource": "https:\/\/external.com\/api\/external_resources\/1",
          "id": 1
        }
      ],
      "hydra:totalItems": 1
    }
    """

  Scenario: External Resources Ids should be generated
    Given I add "Accept" header equal to "application/ld+json"
    And I add "Content-Type" header equal to "application/json"
    And I send a "GET" request to "/external_resources"
    And print last JSON response
    And the JSON should be equal to:
    """
    {
      "@context": "\/contexts\/ExternalResource",
      "@id": "https:\/\/external.com\/api\/external_resources",
      "@type": "hydra:Collection",
      "hydra:member": [
        {
          "@id": "https:\/\/external.com\/api\/external_resources\/1",
          "@type": "ExternalResource",
          "externalDummy": "http:\/\/example.com\/external_dummies\/1",
          "id": 1
        }
      ],
      "hydra:totalItems": 1
    }
    """

  Scenario: I should be able to create Internal Resources with references to External Resources
    Given I add "Accept" header equal to "application/ld+json"
    And I add "Content-Type" header equal to "application/json"
    And I send a "POST" request to "/external_dummies" with body:
    """
    {
      "externalResource": "https://external.com/api/external_resources/2"
    }
    """
    And print last response
    And the response status code should be 201
