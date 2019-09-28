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
    And the JSON should be equal to:
    """
    {
      "@context": "\/contexts\/ExternalDummy",
      "@id": "\/external_dummies",
      "@type": "hydra:Collection",
      "hydra:member": [
        {
          "@id": "\/external_dummies\/1",
          "@type": "ExternalDummy",
          "externalResource": "https:\/\/external.com\/external_resources\/1",
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
      "externalResource": "https://external.com/external_resources/2"
    }
    """
    And the response status code should be 201
    And the JSON should be equal to:
    """
    {
      "@context": "\/contexts\/ExternalDummy",
      "@id": "\/external_dummies\/2",
      "@type": "ExternalDummy",
      "externalResource": "https:\/\/external.com\/external_resources\/2",
      "id": 2
    }
    """
